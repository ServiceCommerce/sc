<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url();?>assets/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>assets/AdminLTE/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>assets/AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="<?php echo base_url();?>assets/AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url();?>assets/AdminLTE/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript"  src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>


    <?php if (isset($header)) {
        foreach ($header as $key => $value) {
            echo '<!-- '. $key .' -->';?>

            <?php echo $value; ?>

        <?php    }
    }?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


</head>
<body class="skin-blue">
<div class="wrapper">

    <!--****************************************************************************************************
                                                HEADER
    *****************************************************************************************************-->
    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>index.php" class="logo">Service Commerce</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><?php echo $this->session->flashdata('last_url'); ?></li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $this->session->userdata('profile');?>" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?php echo $this->session->userdata('nome') ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $this->session->userdata('profile');?>" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo $this->session->userdata('nome');?>
                                    <small>Membro desde <?php echo $this->session->userdata('dataCadastro');?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url();?>index.php/usuarios/minhaConta" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url();?>index.php/mapos/sair" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $this->session->userdata('profile');?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata('nome');?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                      </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">Menu Principal</li>
                <?php
                $data = $this->session->userdata('permissao');
                $resultMenu = $this->permission->menu($data);


                foreach ($resultMenu as $menu){
                    if($menu['link'] == 'drop'){?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span><?php echo $menu['nome'];?></span>
                            </a>
                            <?php
                            foreach($menu['drop'] as $drop){?>
                                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'cUsuario')){ ?>
                                    <ul class="treeview-menu">
                                        <li><a href="<?php echo $drop['link']?>"><i class="<?php echo $drop['icon1'];?>"></i><?php echo $drop['nome'];?></a></li>
                                    </ul>
                                <?php } ?>
                                <?php
                            }#end FOREACH
                            ?>
                        </li>
                        <?php
                    }else{
                        if ($this->router->fetch_class() == $menu['active'] && $this->router->fetch_method() == $menu['method']){?>
                            <li class="active treeview">
                            <?php
                        }else{?>
                            <li class="treeview">
                            <?php
                        }
                        ?>
                        <a href="<?php echo $menu['link']?>">
                            <i class="<?php echo $menu['icon1']; ?>"></i> <span><?php echo $menu['nome'];?></span> <i class="<?php echo $menu['icon2']; ?>"></i>
                        </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>



    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="span12">
            <?php if($this->session->flashdata('error') != null){
                $this->sv_log->set('error', $this->session->flashdata('error'));
                $flash = $this->sv_log->get();
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i><?php echo $flash['title'];?></h4>
                    <?php echo $flash['msg'];?>
                </div>
            <?php }?>

            <?php if($this->session->flashdata('success') != null){
                $this->sv_log->set('success', $this->session->flashdata('success'));
                $flash = $this->sv_log->get();
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i><?php echo $flash['title'];?></h4>
                    <?php echo $flash['msg'];?>
                </div>
            <?php }?>

            <?php if(isset($view)){echo $this->load->view($view);}?>


        </div>

    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> Defaut
        </div>
        <strong>Copyright &copy; 2017 <a href="#">Service Commerce</a>.</strong>Produto de software Lanora.
    </footer>

</div><!-- ./wrapper -->

</body>
</html>
