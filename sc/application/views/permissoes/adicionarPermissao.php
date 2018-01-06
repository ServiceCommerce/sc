<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small> - Adicionar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Adicionar Permissão</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">

                            <form action="<?php echo base_url();?>index.php/permissoes/adicionar" id="formPermissao" method="post">

                                <div class="span12" style="margin-left: 0">

                                    <div class="widget-box">

                                        <div class="widget-content">

                                            <table class="table">
                                                <thead>
                                                <th></th>
                                                <th></th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><label>Nome da Permissão</label>
                                                        <input name="nome" type="text" id="nome" class="form-control" size="10" minlength="6" />
                                                    </td>
                                                    <td>
                                                        <input name="marcarTodos" type="checkbox" value="1" id="marcarTodos" />
                                                        <span class="lbl"> Marcar Todos</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="control-group">
                                                <label for="documento" class="control-label"></label>
                                                <div class="controls">

                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vCliente" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar Cliente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Cliente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Cliente</span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input name="dCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Cliente</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vProduto" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar Produto</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Produto</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Produto</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Produto</span>
                                                                </label>
                                                            </td>

                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Produto Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Produto Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Produto Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Produto Site</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Serviço Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Serviço Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Serviço Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Serviço Site</span>
                                                                </label>
                                                            </td>

                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vServico" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Serviço</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Categoria</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Categoria</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Categoria</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Categoria</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vOs" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir OS</span>
                                                                </label>
                                                            </td>

                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vVenda" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Venda</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vArquivo" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar Arquivo</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Arquivo</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Arquivo</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Arquivo</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="vLancamento" class="marcar" type="checkbox" checked="checked" value="1" />
                                                                    <span class="lbl"> Visualizar Lançamento</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Lançamento</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Lançamento</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Lançamento</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="rCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Cliente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="rServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="rOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="rProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Produto</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="rVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Financeiro</span>
                                                                </label>
                                                            </td>
                                                            <td colspan="2"></td>

                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Configurar Usuário</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Configurar Emitente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Configurar Permissão</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input name="cBackup" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Backup</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                    <div class="form-actions text-center">
                                                        <div class="form-actions text-center">
                                                            <div class="span12">
                                                                <div class="span6 offset3">
                                                                    <a href="<?php echo base_url() ?>index.php/permissoes" id="" class="btn btn-info"><i class="fa fa-undo"></i> Voltar</a>
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-edit" ></i>Adicionar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>


                                    </div>

                            </form>

                            <br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.box -->
    </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->



<script type="text/javascript" src="<?php echo base_url()?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', '#marcarTodos', function(event) {
            if($(this).prop('checked')){

                $('.marcar').each(
                    function(){
                        $(this).attr("checked", true);
                    }
                );
            }else{

                $('.marcar').each(
                    function(){
                        $(this).attr("checked", false);
                    }
                );
            }
        });



        $("#formPermissao").validate({
            rules :{
                nome: {required: true}
            },
            messages:{
                nome: {required: 'Campo obrigatório'}
            }
        });



    });
</script>


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