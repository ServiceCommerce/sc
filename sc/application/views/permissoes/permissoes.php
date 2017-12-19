<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        <small> - Gerenciar</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cPermissao')){ ?>
                        <a href="<?php echo base_url();?>index.php/permissoes/adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Permissão</a>
                    <?php } ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Data de Criação</th>
                            <th>Situação</th>
                            <th></th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($results as $r) {
                            if($r->situacao == 1){$situacao = 'Ativo';}else{$situacao = 'Inativo';}
                            echo '<tr>';
                            echo '<td>'.$r->idPermissao.'</td>';
                            echo '<td>'.$r->nome.'</td>';
                            echo '<td>'.date('d/m/Y',strtotime($r->data)).'</td>';
                            echo '<td>'.$situacao.'</td>';
                            echo '<td>
                                  <a href="'.base_url().'index.php/permissoes/editar/'.$r->idPermissao.'" class="btn btn-info tip-top" title="Editar Permissão"><i class="fa fa-edit"></i></a>
                                  <a href="#modal-excluir" role="button" data-toggle="modal" permissao="'.$r->idPermissao.'" class="btn btn-danger tip-top" title="Desativar Permissão"><i class="fa fa-times"></i></a>
                                 </td>';
                            echo '</tr>';
                        }?>
                        <tr>

                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Data de Criação</th>
                            <th>Situação</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->


<!-- Modal -->
<div id="modal-excluir" class="modal modal-warning" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <form action="<?php echo base_url() ?>index.php/permissoes/desativar" method="post" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 id="myModalLabel">Desativar Permissão</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idPermissao" name="id" value="" />
                <h5 style="text-align: center">Deseja realmente desativar esta permissão?</h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function(){


        $(document).on('click', 'a', function(event) {

            var permissao = $(this).attr('permissao');
            $('#idPermissao').val(permissao);

        });

    });

</script>


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

</body>
</html>