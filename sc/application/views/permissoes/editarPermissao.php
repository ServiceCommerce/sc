<?php $permissoes = unserialize($result->permissoes);?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small> - Editar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Permissão</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="row">
                        <div class="col-md-offset-1 col-sm-10">

                            <form action="<?php echo current_url(); ?>" id="formPermissao" method="post">

                                <div class="span12" style="margin-left: 0">

                                    <div class="widget-box">

                                        <div class="widget-content">

                                            <table class="table">
                                                <thead>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td><label>Nome da Permissão</label>
                                                        <input name="nome" type="text" id="nome" class="form-control" value="<?php echo $result->nome; ?>" />
                                                        <input type="hidden" name="idPermissao" value="<?php echo $result->idPermissao; ?>">
                                                    </td>
                                                    <td><label>Situação</label>
                                                        <select name="situacao" id="situacao" class="form-control">
                                                            <?php if($result->situacao == 1){$sim = 'selected'; $nao ='';}else{$sim = ''; $nao ='selected';}?>
                                                            <option value="1" <?php echo $sim;?>>Ativo</option>
                                                            <option value="0" <?php echo $nao;?>>Inativo</option>
                                                        </select>
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
                                                                    <input <?php if(isset($permissoes['vCliente'])){ if($permissoes['vCliente'] == '1'){echo 'checked';}}?> name="vCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Cliente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aCliente'])){ if($permissoes['aCliente'] == '1'){echo 'checked';}}?> name="aCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Cliente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eCliente'])){ if($permissoes['eCliente'] == '1'){echo 'checked';}}?> name="eCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Cliente</span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dCliente'])){ if($permissoes['dCliente'] == '1'){echo 'checked';}}?> name="dCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Cliente</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vProduto'])){ if($permissoes['vProduto'] == '1'){echo 'checked';}}?> name="vProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Produto</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aProduto'])){ if($permissoes['aProduto'] == '1'){echo 'checked';}}?> name="aProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Produto</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eProduto'])){ if($permissoes['eProduto'] == '1'){echo 'checked';}}?> name="eProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Produto</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dProduto'])){ if($permissoes['dProduto'] == '1'){echo 'checked';}}?> name="dProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Produto</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vProdutoS'])){ if($permissoes['vProdutoS'] == '1'){echo 'checked';}}?> name="vProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Produto Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aProdutoS'])){ if($permissoes['aProdutoS'] == '1'){echo 'checked';}}?> name="aProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Produto Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eProdutoS'])){ if($permissoes['eProdutoS'] == '1'){echo 'checked';}}?> name="eProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Produto Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dProdutoS'])){ if($permissoes['dProdutoS'] == '1'){echo 'checked';}}?> name="dProdutoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Produto Site</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vServicoS'])){ if($permissoes['vServicoS'] == '1'){echo 'checked';}}?> name="vServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Serviço Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aServicoS'])){ if($permissoes['aServicoS'] == '1'){echo 'checked';}}?> name="aServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Serviço Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eServicoS'])){ if($permissoes['eServicoS'] == '1'){echo 'checked';}}?> name="eServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Serviço Site</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dServicoS'])){ if($permissoes['dServicoS'] == '1'){echo 'checked';}}?> name="dServicoS" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Serviço Site</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vServico'])){ if($permissoes['vServico'] == '1'){echo 'checked';}}?> name="vServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aServico'])){ if($permissoes['aServico'] == '1'){echo 'checked';}}?> name="aServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eServico'])){ if($permissoes['eServico'] == '1'){echo 'checked';}}?> name="eServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dServico'])){ if($permissoes['dServico'] == '1'){echo 'checked';}}?> name="dServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Serviço</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vCategoria'])){ if($permissoes['vCategoria'] == '1'){echo 'checked';}}?> name="vCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Categoria</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aCategoria'])){ if($permissoes['aCategoria'] == '1'){echo 'checked';}}?> name="aCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Categoria</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eCategoria'])){ if($permissoes['eCategoria'] == '1'){echo 'checked';}}?> name="eCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Categoria</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dCategoria'])){ if($permissoes['dCategoria'] == '1'){echo 'checked';}}?> name="dCategoria" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Categoria</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>
                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vOs'])){ if($permissoes['vOs'] == '1'){echo 'checked';}}?> name="vOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aOs'])){ if($permissoes['aOs'] == '1'){echo 'checked';}}?> name="aOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eOs'])){ if($permissoes['eOs'] == '1'){echo 'checked';}}?> name="eOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dOs'])){ if($permissoes['dOs'] == '1'){echo 'checked';}}?> name="dOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir OS</span>
                                                                </label>
                                                            </td>

                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vVenda'])){ if($permissoes['vVenda'] == '1'){echo 'checked';}}?> name="vVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aVenda'])){ if($permissoes['aVenda'] == '1'){echo 'checked';}}?> name="aVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eVenda'])){ if($permissoes['eVenda'] == '1'){echo 'checked';}}?> name="eVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dVenda'])){ if($permissoes['dVenda'] == '1'){echo 'checked';}}?> name="dVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Venda</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vArquivo'])){ if($permissoes['vArquivo'] == '1'){echo 'checked';}}?> name="vArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Arquivo</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aArquivo'])){ if($permissoes['aArquivo'] == '1'){echo 'checked';}}?> name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Arquivo</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eArquivo'])){ if($permissoes['eArquivo'] == '1'){echo 'checked';}}?> name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Arquivo</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dArquivo'])){ if($permissoes['dArquivo'] == '1'){echo 'checked';}}?> name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Arquivo</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['vLancamento'])){ if($permissoes['vLancamento'] == '1'){echo 'checked';}}?> name="vLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Visualizar Lançamento</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['aLancamento'])){ if($permissoes['aLancamento'] == '1'){echo 'checked';}}?> name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Adicionar Lançamento</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['eLancamento'])){ if($permissoes['eLancamento'] == '1'){echo 'checked';}}?> name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Editar Lançamento</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['dLancamento'])){ if($permissoes['dLancamento'] == '1'){echo 'checked';}}?> name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Excluir Lançamento</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['rCliente'])){ if($permissoes['rCliente'] == '1'){echo 'checked';}}?> name="rCliente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Cliente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['rServico'])){ if($permissoes['rServico'] == '1'){echo 'checked';}}?> name="rServico" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Serviço</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['rOs'])){ if($permissoes['rOs'] == '1'){echo 'checked';}}?> name="rOs" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório OS</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['rProduto'])){ if($permissoes['rProduto'] == '1'){echo 'checked';}}?> name="rProduto" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Produto</span>
                                                                </label>
                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['rVenda'])){ if($permissoes['rVenda'] == '1'){echo 'checked';}}?> name="rVenda" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Venda</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['rFinanceiro'])){ if($permissoes['rFinanceiro'] == '1'){echo 'checked';}}?> name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Relatório Financeiro</span>
                                                                </label>
                                                            </td>

                                                            <td colspan="2"></td>

                                                        </tr>
                                                        <tr><td colspan="4"></td></tr>

                                                        <tr>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['cUsuario'])){ if($permissoes['cUsuario'] == '1'){echo 'checked';}}?> name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Configurar Usuário</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['cEmitente'])){ if($permissoes['cEmitente'] == '1'){echo 'checked';}}?> name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Configurar Emitente</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['cPermissao'])){ if($permissoes['cPermissao'] == '1'){echo 'checked';}}?> name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                                    <span class="lbl"> Configurar Permissão</span>
                                                                </label>
                                                            </td>

                                                            <td>
                                                                <label>
                                                                    <input <?php if(isset($permissoes['cBackup'])){ if($permissoes['cBackup'] == '1'){echo 'checked';}}?> name="cBackup" class="marcar" type="checkbox" value="1" />
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
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-edit" ></i>Editar</button>
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