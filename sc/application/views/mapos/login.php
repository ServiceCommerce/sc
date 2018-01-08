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
        <img style="max-width: 50%" src="<?php echo base_url('docs/System/img/logosc.png');?>">
        <a href="#"><b>Service</b>Commerce</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Faça login para iniciar sua sessão</p>
        <form  class="form-vertical" id="formLogin" method="post" action="<?php echo base_url()?>index.php/login/verificarLogin">
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



<script type="text/javascript">
    $(document).ready(function(){

        $('#email').focus();
        $("#formLogin").validate({
            rules :{
                email: { required: true, email: true},
                senha: { required: true}
            },
            messages:{
                email: { required: 'Campo Requerido.', email: 'Insira Email válido'},
                senha: {required: 'Campo Requerido.'}
            },
            submitHandler: function( form ){
                var dados = $( form ).serialize();


                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>index.php/mapos/verificarLogin?ajax=true",
                    data: dados,
                    dataType: 'json',
                    success: function(data)
                    {
                        if(data.result == true){
                            window.location.href = "<?php echo base_url();?>index.php/mapos";
                        }
                        else{
                            $('#call-modal').trigger('click');
                        }
                    }
                });

                return false;
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

    });

</script>



<a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>

<div id="notification" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel">MapOS</h4>
    </div>
    <div class="modal-body">
        <h5 style="text-align: center">Os dados de acesso estão incorretos, por favor tente novamente!</h5>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>

    </div>
</div>

</body>
</html>