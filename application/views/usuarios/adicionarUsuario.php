<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small> - Adicionar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="text-center">Adicionar novo usuário</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="box box-primary">
                        <form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal">
                            <table class="table">
                                <thead>
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><label for="nome" class="control-label">Nome: <span class="required">*</span></label></td>
                                    <td><input type="text" class="form-control" id="nome"  name="nome" value="<?php echo set_value('nome');?>" /></td>
                                </tr>
                                <tr>
                                    <td><label for="email" class="control-label">Email<span class="required">*</span></label></td>
                                    <td><input class="form-control" id="email" type="email" name="email" /></td>
                                </tr>
                                <tr>
                                    <td><label for="senha" class="control-label">Senha<span class="required">*</span></label></td>
                                    <td><input class="form-control" id="senha" type="password" name="senha" /></td>
                                </tr>
                                <tr>
                                    <td><label  class="control-label">Situação*</label></td>
                                    <td>
                                        <select class="form-control" name="situacao" id="situacao">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label  class="control-label">Permissões<span class="required">*</span></label></td>
                                    <td>
                                        <select class="form-control" name="permissoes_id" id="permissoes_id">
                                            <?php foreach ($permissoes as $p) {
                                                echo '<option value="'.$p->idPermissao.'">'.$p->nome.'</option>';
                                            } ?>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="form-actions text-center">
                                <div class="span12">
                                    <div class="span6 offset3">
                                        <a href="<?php echo base_url() ?>index.php/usuarios" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar</button>
                                    </div>
                                </div>
                            </div>
                        </form> <!-- /. Form-->
                    </div>
                </div>
            </div><!-- /.box-body -->
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