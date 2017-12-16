<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Produtos
        <small> - Adicionar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Produto</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">
                            <form action="<?php echo current_url(); ?>" id="formUsuario" method="post" class="form-horizontal">

                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><label for="nome" class="control-label">Nome<span class="required"></span></label></td>
                                        <td><input type="text" class="form-control" id="nome"  name="nome" value="<?php echo set_value('nome'); ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Unidade<span class="required"></span></label></td>
                                        <td><input class="form-control" id="unidade" type="text" name="unidade" value="<?php echo set_value('unidade'); ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="senha" class="control-label">Preço Compra<span class="required"></span></label></td>
                                        <td><input class="form-control" id="precoCompra" type="text" name="precoCompra" value="<?php echo set_value('precoCompra'); ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td><label for="telefone" class="control-label">Preço Vanda<span class="required"></span></label></td>
                                        <td><input class="form-control" id="precoVenda" type="text" name="precoVenda" value="<?php echo set_value('precoVenda'); ?>"/></td>
                                        <td><INPUT TYPE="checkbox" NAME="aPartir" VALUE="1"> A Parpir De:</td>
                                    </tr>
                                    <tr>
                                        <td><label for="celular" class="control-label">Estoque</label></td>
                                        <td><input class="form-control" id="estoque" type="text" name="estoque" value="<?php echo set_value('estoque'); ?>"/></td>
                                        <td><INPUT TYPE="checkbox" NAME="semEstoque" VALUE="1"> Produto Sem Estoque</td>
                                    </tr>
                                    <tr>
                                        <td><label for="celular" class="control-label">Estoque Mínimo</label></td>
                                        <td><input class="form-control" id="estoqueMinimo" type="text" name="estoqueMinimo" value="<?php echo set_value('estoqueMinimo'); ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td><label  class="control-label">Categoria<span class="required"></span></label></td>
                                        <td>
                                            <select class="form-control" name="categoria" id="categoria">
                                                <option name="categoria" value="">Selecione uma categoria</option>
                                                <?php
                                                foreach ($categ as $value) {
                                                    echo '<option value="'.$value->idCategoria_prod.'">'.$value->nome.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="celular" class="control-label">Divulgação</label></td>
                                        <td><?php echo $exibir_site?></td>
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