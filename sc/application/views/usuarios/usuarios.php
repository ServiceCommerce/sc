<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        <small> - Gerenciar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?php echo base_url()?>index.php/usuarios/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Usuário</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID Useário</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Nivel de permissões</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $r) {?>
                            <tr>
                                <td><?php echo $r->idUsuarios?></td>
                                <td><?php echo $r->nome;?></td>
                                <td><?php echo $r->email;?></td>
                                <td><?php echo $r->permissao;?></td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/usuarios/editar/'.$r->idUsuarios;?>" class="btn btn-info tip-top" title="Editar Usuário"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID Useário</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Nivel de permissões</th>
                            <th>Ações</th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

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
</body>
</html>