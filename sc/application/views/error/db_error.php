<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>S.V | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets/AdminLTE') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/AdminLTE') ?>/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Service</b>Commerce</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>
        <form  class="form-vertical" id="formLogin" method="post" action="<?php echo base_url()?>index.php/mapos/verificarLogin">
            <?php if($this->session->flashdata('error') != null){?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->flashdata('error');?>
                </div>
            <?php }?>

            <div class="form-group has-feedback">

                <input type="text" id="email" name="email" class="form-control" placeholder="Email" />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="senha" id="senha" type="password" class="form-control" placeholder="Password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Logar</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="#">Esquieceu sua senha?</a><br>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


</body>
</html>