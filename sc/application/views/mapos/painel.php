<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <table class="table">
            <thead>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            <tr>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCliente')){ ?>
                    <td>
                        <!-- small box -->
                        <div class="small-box bg-aqua" style="">
                            <div class="inner">
                                <h3><?php echo $this->db->count_all('clientes');?></h3>
                                <p><h4>Clientes</h4></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?php echo base_url()?>index.php/clientes" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </td><!-- ./col -->
                <?php } ?>

                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vProduto')){ ?>
                    <td>
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $this->db->count_all('produtos');?></i></h3>
                                <p><h4>Produtos</h4></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-barcode"></i>
                            </div>
                            <a href="<?php echo base_url()?>index.php/produtos" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </td><!-- ./col -->
                <?php } ?>

                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCategoria')){ ?>
                    <td>
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $this->db->count_all('categoria_produto');?></i></h3>
                                <p><h4>Categorias</h4></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-dashboard"></i>
                            </div>
                            <a href="<?php echo base_url()?>index.php/categorias" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </td><!-- ./col -->
                <?php } ?>

            </tr>
            </tbody>
        </table>





    </div><!-- /.row -->

</section><!-- /.content -->



<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
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