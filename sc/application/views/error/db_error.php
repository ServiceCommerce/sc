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
        <p class="login-box-msg"><h3 style="color: red;"><b>Erro de versão de DB</b></h3></p>
        <p><b>VERSÃO ATUAL DO BANCO DE DADOS:  </b><?php echo $currentVersion?></p>
        <p><b>VERSÃO REQUERIDA DO BANCO DE DADOS:  </b><?php echo $dbVersion?></p>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->


</body>
</html>