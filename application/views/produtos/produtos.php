<link rel="stylesheet" href="<?php echo base_url();?>js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Produtos
        <small> - Gerenciar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aProduto')){ ?>
                        <a href="<?php echo base_url();?>index.php/produtos/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Produto</a>
                    <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID Prod.</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Preço RS:</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $r) {?>
                            <tr>
                                <td><?php echo $r->idProdutos?></td>
                                <td><?php echo $r->nome;?></td>
                                <td><?php echo $r->estoque;?></td>
                                <td><?php echo number_format($r->precoVenda,2,',','.');?></td>
                                <td>
                                    <?php
                                    if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){
                                        echo '<a style="margin-right: 1%" href="'.base_url().'index.php/produtos/visualizar/'.$r->idProdutos.'" class="btn tip-top" title="Visualizar Produto"><i class="fa fa-eye"></i></a>  ';
                                    }
                                    if($this->permission->checkPermission($this->session->userdata('permissao'),'eProduto')){
                                        echo '<a style="margin-right: 1%" href="'.base_url().'index.php/produtos/editar/'.$r->idProdutos.'" class="btn btn-info tip-top" title="Editar Produto"><i class="fa fa-edit"></i></a>';
                                    }
                                    if($this->permission->checkPermission($this->session->userdata('permissao'),'dProduto')){
                                        echo '<a href="#modal-excluir" role="button" data-toggle="modal" produto="'.$r->idProdutos.'" class="btn btn-danger tip-top" title="Excluir Produto"><i class="fa fa-times"></i></a>';
                                    }

                                    echo '</td>';
                                    echo '</tr>';
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID Prod.</th>
                            <th>Nome</th>
                            <th>Estoque</th>
                            <th>Preço RS:</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<!-- Modal -->
<div id="modal-excluir" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form action="<?php echo base_url() ?>index.php/produtos/excluir" method="post" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 id="myModalLabel">Excluir Produto</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idProduto" name="id" value="" />
                <h5 style="text-align: center">Deseja realmente excluir este produto?</h5>
                <h5 style="text-align: center">
                    * Caso esse produto esteja publicado no site, seus dados de publicação também serão excluidos
                </h5>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>
</div>

<!-- jQuery 2.1.3 -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url();?>assets/AdminLTE/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url();?>assets/AdminLTE/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false,
            "oLanguage": {
                "sInfo": "Exibindo de _START_ a _END_ dos _TOTAL_ resultados encontrados",
                "sLengthMenu": "_MENU_ Resultados por página",
                "sSearch": "Pesquisar _INPUT_",
                "oPaginate": {
                    "sNext": "Próxima",
                    "sPrevious": "Anterior"
                }
            }

        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function(){


        $(document).on('click', 'a', function(event) {

            var produto = $(this).attr('produto');
            $('#idProduto').val(produto);

        });

    });

</script>
</body>
</html>