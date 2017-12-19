<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Categorias</h1>
            <div class="list-group">
                <?php
                foreach ($categorias as $categoria) {?>
                    <a href="<?php echo base_url('index.php/shop/produtos/') . $categoria->idCategoria_prod;?>" class="list-group-item" style="max-width: 250px; white-space: nowrap;"><?php echo $categoria->nome;?></php></a>
                    <?php
                }
                ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <?php
            if(!@$produtos){?>
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="<?php echo base_url('assets/shop/img/teste2.jpg')?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <?php
            }else{ ?>
                <br>
                <div class="row">

                    <?php
                    foreach ($produtos as $produto) {?>
                        <div class="col-md-3 shop_box" style="padding: 10px">
                            <a href="<?php echo base_url('index.php/shop/produtosSingle/') . $produto->idProdutos;?>">
                                <img src="<?php echo $produto->url;?>" style="min-height: 250px; max-height: 250px; min-width: 100%" class="img-responsive" alt=""/>
                                <div class="shop_desc">
                                    <h3><a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $produto->idProdutos;?>"><?php echo $produto->nome;?></a></h3>
                                    <p><?php echo mb_strimwidth($produto->descricao, 0, 90, '...');?></p>
                                    <span class="reducedfrom"><?php echo $produto->precoVenda;?></span>
                                    <span class="actual"><?php echo $produto->precoVenda;?></span><br>
                                    <ul class="buttons">
                                        <li class="shop_btn"><a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $produto->idProdutos;?>">Saiba mais</a></li>
                                        <div class="clear"> </div>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    <?php }?>

                </div>
                <!-- /.row -->
                <?php
            }
            ?>

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
    <BR><BR><BR>

</div>
<!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/shop/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/shop/popper/popper.min.js');?>"></script>
<script src="<?php echo base_url('assets/shop/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
