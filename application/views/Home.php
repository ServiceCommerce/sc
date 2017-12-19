<!--********************************************************************************************************************
                                                Container 1
*********************************************************************************************************************-->

<div class="banner">
    <!-- start slider -->
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide">
                <!-- Slide image -->
                <img src="<?php echo base_url()?>assets/images/slider1.jpg" class="img-responsive" alt=""/>
                <!-- /Slide image -->
                <!-- Texts container -->
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <!-- Text title -->
                        <h1 class="title">Serralheria<br>Lobo Jonior</h1>
                        <!-- /Text title -->
                        <!-- <div class="button"><a href="#">See Details</a></div> -->
                    </div>
                </div>
                <!-- /Texts container -->
            </div>
            <!-- /Duplicate to create more slides -->
            <div class="slide">
                <img src="<?php echo base_url()?>assets/images/slider2.jpg" class="img-responsive" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h1 class="title"></h1>
                        <!-- <div class="button"><a href="#">See Details</a></div> -->
                    </div>
                </div>
            </div>
            <!--/slide -->
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    <!--/slider -->
</div>
<!--********************************************************************************************************************
                                                Container 2
*********************************************************************************************************************-->
<div class="main">
    <div class="content-top">
        <!-- <h2>Saiba mais</h2> -->
        <!-- <p>hendrerit in vulputate velit esse molestie consequat, vel illum dolore</p> -->
        <!--  <div class="close_but"><i class="close1"> </i></div> -->
        <ul id="flexiselDemo3">
            <li><img src="<?php echo base_url()?>assets/images/home_container_2_pic1.jpg" /></li>
            <li><img src="<?php echo base_url()?>assets/images/home_container_2_pic2.jpg" /></li>
            <li><img src="<?php echo base_url()?>assets/images/home_container_2_pic3.jpg" /></li>
            <li><img src="<?php echo base_url()?>assets/images/home_container_2_pic4.jpg" /></li>
            <li><img src="<?php echo base_url()?>assets/images/home_container_2_pic5.jpg" /></li>
        </ul>
       <!-- <h3>O que nós podemos fazer por você hoje?</h3> -->
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 5,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="<?php echo base_url()?>/assets/bootstrap/js/jquery.flexisel.js"></script>
    </div>
</div>
<!--********************************************************************************************************************
                                                Container 3
*********************************************************************************************************************-->

<div class="content-bottom">
    <div class="container">
        <div class="row content_bottom-text">
            <div class="col-md-7">
                <h3>Uma Breve História</h3>
                <p class="m_1">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis at vero eros et accumsan et iusto odio.
                </p>
                <p class="m_2">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis at vero eros et accumsan et iusto odio.
                </p>
            </div>
        </div>
    </div>
</div>
<!--********************************************************************************************************************
                                                Container 4
*********************************************************************************************************************-->
<div class="features">
    <div class="container">
        <h3 class="m_3">Um pouco mais sobre o nosso trabalho</h3>
        <div class="close_but"><i class="close1"> </i></div>
        <div class="row">
            <div class="col-md-3 top_box">
                <div class="view view-ninth">
                        <a href="index.php/shop/produtos/17">
                            <img src="<?php echo base_url()?>assets/images/home_container_4_pic1.jpg" class="img-responsive" alt=""/>
                            <div class="mask mask-1"> </div>
                            <div class="mask mask-2"> </div>
                            <div class="content">
                                <h2>Blindex</h2>
                                <p>Trabalho limpo e com fino acabamento para toda a sua casa ou empresa.</p>
                            </div>
                        </a>
                </div
            </div>
            <h4 class="m_4">Fino Acabamento</h4>
            <p class="m_5">
                Não se preocupe com os detalhes, aqui na SERRALHERIA LOBO JUNIOR nós faremos isso por você. Contamos com
                profissionais experientes e atentos a cada detalhe.
            </p>
        </div>

        <div class="col-md-3 top_box">
            <div class="view view-ninth">
                    <img src="<?php echo base_url()?>assets/images/home_container_4_pic2.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                    <div class="content">
                        <h2>Projetos sobe medida</h2>
                        <p>Estruturas metálica são garantias de trabalhos rápidos e limpos.</p>
                    </div>
            </div>
            <h4 class="m_4">Estruturas</h4>
            <p class="m_5">Para reformar ou construir estruturas, escadas, sacadas e muito mais, conte com a nossa experiência.</p>
        </div>
        <div class="col-md-3 top_box">
            <div class="view view-ninth">
                    <img src="<?php echo base_url()?>assets/images/home_container_4_pic3.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                    <div class="content">
                        <h2>Aproveito ao máximo</h2>
                        <p>Proteja-se da chuva sem perder a luz do dia.</p>
                    </div>
            </div>
            <h4 class="m_4">Toldos, Coberturas e Telhados</h4>
            <p class="m_5">
                Ótimas opções para melhor aproveitamento da luz do dia, sem perder a qualidade e com excelente acabamento.
                Projetos em vidro, Policarbonato e metais.
            </p>
        </div>
        <div class="col-md-3 top_box1">
            <div class="view view-ninth">
                    <img src="<?php echo base_url()?>assets/images/home_container_4_pic4.jpg" class="img-responsive" alt=""/>
                    <div class="mask mask-1"> </div>
                    <div class="mask mask-2"> </div>
                    <div class="content">
                        <h2>Grades e Portões</h2>
                        <p>Desenhos e acabamentos personalizados. Aqui seu sonho se torna realidade.</p>
                    </div>
            </div>
            <h4 class="m_4">Grades e Portões</h4>
            <p class="m_5">
                Nos deixe construir a sua segurança. Grades e Portões com modelos diversificados ou
                personalizados, todos os tipos e tamanhos para caber perfeitamente em seu projeto.
            </p>
        </div>
    </div>
</div>
</div>