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
                            <div id="formProduto" class="form-horizontal" >


                                <!-- inicia o form de envio -->
                                <?php echo form_open('produtos/descricaoSite') ?>


                                <!-- Validação de formulário -->
                                <?php echo form_hidden('up', true);?>

                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <h4 class="col-md-offset-4">Selecione uma imagem de destaque</h4>
                                    <tr>
                                                <?php
                                                foreach ($imagens as $imagen) {?>
                                                    <tr>
                                                        <label style="padding: 10px">
                                                            <input type="radio" name="destaque" value="<?php echo $imagen->idImg_prod;?>">Selecione<br>
                                                            <img src="<?php echo $imagen->url;?>" class="image" style="max-height:200px">
                                                        </label>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                    </tr>
                                    <tr>
                                        <td><label for="nome" class="control-label">Descrição<span class="required"></span></label></td>
                                        <td><textarea id="descricao" name="descricao" rows="10" cols="80"></textarea></td>
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