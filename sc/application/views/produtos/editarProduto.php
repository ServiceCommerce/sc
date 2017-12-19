<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Produtos
        <small> - Ar</small>
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
                            <form action="<?php echo current_url(); ?>" id="produtos" method="post" class="form-horizontal">

                                <?php
                                    echo form_hidden('id', @$result->idProdutos);
                                    echo form_hidden('up', true);
                                ?>

                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><label for="nome" class="control-label">Nome<span class="required"></span></label></td>
                                        <td><input type="text" class="form-control" id="nome" value="<?php echo @$result->nome; ?>" name="nome" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="control-label">Unidade<span class="required"></span></label></td>
                                        <td><input class="form-control" id="unidade" type="text" value="<?php echo @$result->unidade; ?>" name="unidade" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="senha" class="control-label">Preço Compra<span class="required"></span></label></td>
                                        <td><input class="form-control" id="precoCompra" type="text" name="precoCompra" value="<?php echo @$result->precoCompra; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td><label for="telefone" class="control-label">Preço Vanda<span class="required"></span></label></td>
                                        <td><input class="form-control" id="precoVenda" type="text" name="precoVenda" value="<?php echo @$result->precoVenda; ?>" /></td>
                                        <td><INPUT TYPE="checkbox" <?php if($result->aPartir == 1){echo 'checked="checked"';}?> NAME="aPartir" VALUE="1"> A Parpir De:</td>
                                    </tr>
                                    <tr>
                                        <td><label for="celular" class="control-label">Estoque</label></td>
                                        <td><input class="form-control" id="estoque" type="text" name="estoque" value="<?php echo @$result->estoque; ?>" /></td>
                                        <td><INPUT TYPE="checkbox" <?php if($result->semEstoque == 1){echo 'checked="checked"';}?> NAME="semEstoque" VALUE="1"> Produto Sem Estoque</td>
                                    </tr>
                                    <tr>
                                        <td><label for="celular" class="control-label" >Estoque Mínimo</label></td>
                                        <td><input class="form-control" id="estoqueMinimo" type="text" name="estoqueMinimo" value="<?php echo @$result->estoqueMinimo; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td><label  class="control-label">Categoria<span class="required"></span></label></td>
                                        <td>
                                            <select class="form-control" name="categoria" id="categoria">
                                                <?php
                                                foreach ($categoria as $value) {
                                                    if($value->idCategoria_prod == $result->categoria_prod_id){
                                                        echo '<option selected value="'.$value->idCategoria_prod.'">'.$value->nome.'</option>';
                                                    }else{
                                                        echo '<option value="'.$value->idCategoria_prod.'">'.$value->nome.'</option>';
                                                    }
                                                }
                                                ?>
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="celular" class="control-label">Divulgação</label></td>
                                        <td><INPUT TYPE="checkbox" <?php if($result->exibir == 1){echo 'checked="checked"';}?> NAME="exibirNoSite" VALUE="1"> Exibir produto no site</td>
                                    </tr>
                                    </tbody>
                                </table>

                                <div class="form-actions text-center">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <a href="<?php echo base_url() ?>index.php/produtos" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                            <?php
                                            if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){?>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-edit" ></i>Editar</button>
                                                <?php
                                            }
                                            ?>
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