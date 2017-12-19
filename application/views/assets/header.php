<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $title;?></title>
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url();?>assets/bootstrap/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.min.js"></script>
    <!--<script src="js/jquery.easydropdown.js"></script>-->
    <!--start slider -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/fwslider.css" media="all">
    <script src="<?php echo base_url();?>assets/bootstrap/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/fwslider.js"></script>



    <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/bootstrap/css/jquery.fancybox.css" media="screen" />
    <script type="text/javascript">
        $(document).ready(function() {
            /*
             *  Simple image gallery. Uses default settings
             */

            $('.fancybox').fancybox();

        });
    </script>


    <link rel="sortcut icon" href="<?php echo base_url();?>assets/images/fivecon.ico" type="image/x-icon" />

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/shop/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">



    <!--end slider -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>

    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/etalage.css">
    <script src="<?php echo base_url()?>assets/js/jquery.etalage.min.js"></script>
    <script>
        jQuery(document).ready(function($){

            $('#etalage').etalage({
                thumb_image_width: 300,
                thumb_image_height: 400,

                show_hint: true,
                click_callback: function(image_anchor, instance_id){
                    alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                }
            });
            // This is for the dropdown list example:
            $('.dropdownlist').change(function(){
                etalage_show( $(this).find('option:selected').attr('class') );
            });

        });
    </script>

    <style type="text/css">
        .imagem{
            position:relative;
        }
        .imagem-mascara {
            width:50px; /* largura da imagem máscara */
            height:40px; /* altura da imagem máscara */
            position:absolute;
            top:0;
            left:0;
            background:url(<?php echo base_url();?>assets/images/_A_logo.png) 0 0 no-repeat; /* imagem máscara */
        }
    </style>


</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-left">
                    <div class="logo">
                        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt=""/></a>
                    </div>
                    <div class="menu">
                        <a class="toggleMenu" href="#"><img src="<?php echo base_url();?>assets/images/nav.png" alt="" /></a>
                        <ul class="nav" id="nav">
                            <li class="<?php if(isset($home_current)){echo $home_current;}?>"><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="<?php if(isset($team_current)){echo $team_current;}?>"><a href="<?php echo base_url();?>index.php/team">Empresa</a></li>
                            <li class="<?php if(isset($servicos_current)){echo $servicos_current;}?>"><a href="<?php echo base_url();?>index.php/servico">Serviços</a></li>
                            <li class="<?php if(isset($shop_current)){echo $shop_current;}?>"><a href="<?php echo base_url();?>index.php/Shop/produtos">Shop</a></li>
                            <li class="<?php if(isset($contato_current)){echo $contato_current;}?>"><a href="<?php echo base_url();?>index.php/contato">Contato</a></li>
                            <div class="clear"></div>
                        </ul>
                        <script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/responsive-nav.js"></script>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="header_right">
                    <!-- start search -->
                    <div class="search-box">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <!----search-scripts-->
                    <script src="<?php echo base_url();?>assets/bootstrap/js/classie.js"></script>
                    <script src="<?php echo base_url();?>assets/bootstrap/js/uisearch.js"></script>
                    <script>
                        new UISearch( document.getElementById( 'sb-search' ) );
                    </script>
                    <ul class="icon1 sub-icon1 profile_img">
                        <li><a class="active-icon c1" href="<?php echo base_url('index.php/mapos/login');?>"> </a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($this->session->flashdata('error') != null){?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $this->session->flashdata('error');?>
    </div>
<?php }?>

<?php if($this->session->flashdata('success') != null){?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo $this->session->flashdata('success');?>
    </div>
<?php }?>




<?php
if(isset($view)){
    $this->load->view($view);
}
?>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>Produtos</h4>
                    <li><a href="#">Fino Acabamento</a></li>
                    <li><a href="#">Estruturas</a></li>
                    <li><a href="#">Toldos, Estruturas e Telhados</a></li>
                    <li><a href="#">Sob Medida</a></li>
                </ul>
            </div>
            <!--
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>Parcerias</h4>
                    <li><a href="#">Careers and internships</a></li>
                    <li><a href="#">Sponserships</a></li>
                    <li><a href="#">team</a></li>
                    <li><a href="#">Catalog Request/Download</a></li>
                </ul>
            </div>
            -->
            <div class="col-md-3">
                <ul class="footer_box">
                    <h4>Suporte ao Cliente</h4>
                    <li><a href="#">Contato</a></li>
                    <li><a href="#">Rastreamento de pedido</a></li>
                    <li><a href="#">Garantia</a></li>
                    <li><a href="#">Peças para reposição</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer_box">
                    <!--
                                        <h4>Newsletter</h4>
                                        <div class="footer_search">
                                            <form>
                                                <input type="text" value="Enter your email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your email';}">
                                                <input type="submit" value="Go">
                                            </form>
                                        </div>
                    -->
                    <ul class="social">
                        <li class="facebook"><a href="#"><span> </span></a></li>
                        <li class="twitter"><a href="#"><span> </span></a></li>
                        <!--
                        <li class="instagram"><a href="#"><span> </span></a></li>
                        <li class="pinterest"><a href="#"><span> </span></a></li>
                        <li class="youtube"><a href="#"><span> </span></a></li>
                        -->
                    </ul>

                </ul>
            </div>
        </div>

    </div>
</div>
</body>
</html>

</body>
</html>