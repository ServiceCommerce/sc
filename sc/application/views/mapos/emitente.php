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
                    <h3 class="box-title">Dados do Emitente</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">
                            <?php if(!isset($dados) || $dados == null) {?>
                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="widget-content ">
                                                <div class="alert alert-danger">
                                                    Nenhum dado foi cadastrado até o momento. Essas informações
                                                    estarão disponíveis na tela de impressão de OS.
                                                </div>
                                                <a href="#modalCadastrar" data-toggle="modal" role="button" class="btn btn-success">Cadastrar Dados</a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                </table>
                                <br>




                                <div id="modalCadastrar" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <form action="<?php echo base_url(); ?>index.php/mapos/cadastrarEmitente" id="formCadastrar" enctype="multipart/form-data" method="post" class="form-horizontal" >
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="myModalLabel">MapOS - Cadastrar Dados do Emitente</h3>
                                            </div>
                                            <div class="modal-body">


                                                <div class="control-group">
                                                    <label for="nome" class="control-label">Razão Social<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input id="nome" class="form-control" type="text" name="nome" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="cnpj" class="control-label"><span class="required">CNPJ*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="cnpj" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">IE*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="ie" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Logradouro*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="logradouro" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Número*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="numero" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Bairro*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="bairro" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Cidade*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="cidade" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">UF*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="uf" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Telefone*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="telefone" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">E-mail*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="email" value="" />
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label for="logo" class="control-label"><span class="required">Logomarca*</span></label>
                                                    <div class="controls">
                                                        <input type="file" name="userfile" value="" />
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
                                                <button class="btn btn-success">Cadastrar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            <?php } else { ?>

                                <table class="table">
                                    <thead>
                                    <th></th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <div class="alert alert-info">Os dados abaixo serão utilizados no cabeçalho das telas de impressão.</div>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%"><img style="max-width: 100%" src=" <?php echo $dados[0]->url_logo; ?> "></td>
                                        <td> <span style="font-size: 20px; "> <?php echo $dados[0]->nome; ?> </span> </br><span><?php echo $dados[0]->cnpj; ?> </br> <?php echo $dados[0]->rua.', nº:'.$dados[0]->numero.', '.$dados[0]->bairro.' - '.$dados[0]->cidade.' - '.$dados[0]->uf; ?> </span> </br> <span> E-mail: <?php echo $dados[0]->email.' - Fone: '.$dados[0]->telefone; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <br/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-actions text-center">
                                    <div class="span12">
                                        <div class="span6 offset3">
                                            <a href="#modalAlterar" data-toggle="modal" role="button" class="btn btn-primary">Alterar Dados</a>
                                            <a href="#modalLogo" data-toggle="modal" role="button" class="btn btn-info">Alterar Logo</a><br/><br/>
                                        </div>
                                    </div>
                                </div>




                                <div id="modalAlterar" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <form action="<?php echo base_url(); ?>index.php/mapos/editarEmitente" id="formAlterar" enctype="multipart/form-data" method="post" class="form-horizontal" >
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="">MapOS - Editar Dados do Emitente</h3>
                                            </div>
                                            <div class="modal-body">


                                                <div class="control-group">
                                                    <label for="nome" class="control-label">Razão Social<span class="required">*</span></label>
                                                    <div class="controls">
                                                        <input id="nome" class="form-control" type="text" name="nome" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="cnpj" class="control-label"><span class="required">CNPJ*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="cnpj" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">IE*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="ie" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Logradouro*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="logradouro" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Número*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="numero" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Bairro*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="bairro" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Cidade*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="cidade" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">UF*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="uf" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">Telefone*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="telefone" value=""  />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="descricao" class="control-label"><span class="required">E-mail*</span></label>
                                                    <div class="controls">
                                                        <input class="form-control" type="text" name="email" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
                                                <button class="btn btn-primary">Alterar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- .End Modal .. modalAlterar-->


                                <div id="modalLogo" class="modal modal-info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <form action="<?php echo base_url(); ?>index.php/mapos/editarLogo" id="formLogo" enctype="multipart/form-data" method="post" class="form-horizontal" >
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h3 id="">MapOS - Alterar Logomarca</h3>
                                            </div>
                                            <div class="modal-body">
                                                <div class="span12 alert">Selecione uma nova imagem da logomarca. Tamanho indicado (130 X 130).</div>
                                                <div class="control-group">
                                                    <label for="logo" class="control-label"><span class="required">Logomarca*</span></label>
                                                    <div class="controls">
                                                        <input type="file" name="userfile" value="" />
                                                        <input id="nome" type="hidden" name="id" value="<?php echo $dados[0]->id; ?>"  />
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal" aria-hidden="true" id="btnCancelExcluir">Cancelar</button>
                                                <button class="btn btn-primary">Alterar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> <!-- .End modal .. modalLogo-->

                            <?php } ?>
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