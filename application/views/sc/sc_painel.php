<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

    h3 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Bem vinda ao Service Commerce!</h1>

	<div id="body">
		<p>Bem vinda a página inicial do SERVICE COMMERCE!</p>

		<p>Abaixo seguem informações atuais do sistema</p>

        <code>
            <table>
                <thead>
                    <td></td>
                    <td></td>
                </thead>
                <tbody>
                    <tr>
                        <td>Conexão com banco de dados:</td>
                        <?php echo ($db_conect == true) ? '<td><b style="color: green"> ATIVADO</b></td>' : '<td><b style="color: red">DESATIVADO</b></td>' ?>
                    </tr>
                    <tr>
                        <td>Mensagem de db_debug:</td>
                        <?php echo ($db_debug == true) ? '<td><b style="color: red"> ATIVADO</b> *desativação automática com mudança de <B>STATUS DA APLICAÇÃO</B></td>' : '<td><b style="color: #00CC00">DESATIVADO</b></td>' ?>
                    </tr>
                    <tr>
                        <td>Status da aplicação:</td>
                        <?php echo (ENVIRONMENT == 'production') ? '<td><b style="color: green">'.ENVIRONMENT.'</b></td>' : '<td><b style="color: red">'.ENVIRONMENT.'</b> *altere para PRODUCTION</td>' ?>
                    </tr>
                </tbody>
            </table>
        </code>

		<p>Acesse também as páginas de exemplo</p>
        <h3>
            <a href="<?php echo base_url('index.php/home') ?>">HOME</a> |
            <a href="<?php echo base_url('index.php/shop') ?>">SHOP</a> |
            <a href="<?php echo base_url('index.php/client') ?>">LOGIN</a> |
        </h3>

        <p>Acesse o painel de status da aplicação central <a href="<?php echo base_url('sc/index.php/sc/sc_painel')?>"><b>PAINEL DE STATUS II</b></a></p>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>