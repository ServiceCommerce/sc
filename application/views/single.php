 <div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-9 single_left">
                    <div class="single_image">
                        <ul id="etalage">
                            <?php
                            foreach ($imagemProduto as $imagem) {?>
                            <li>
                                <img class="etalage_thumb_image" src="<?php echo $imagem?>" />
                                <img class="etalage_source_image" src="<?php echo $imagem?>" />
                            <li>
<?php                       }
                            ?>
                        </ul>
                    </div>
                    <!-- end product_slider -->
                    <div class="single_right">
                        <h3><?php echo $produtos->nome;?> </h3>
                        <p class="m_10"><?php echo $produtos->descricao;?></p>
                        <!--
                        <ul class="options">
                            <h4 class="m_12">Select a Size(cm)</h4>
                            <li><a href="#">151</a></li>
                            <li><a href="#">148</a></li>
                            <li><a href="#">156</a></li>
                            <li><a href="#">145</a></li>
                            <li><a href="#">162(w)</a></li>
                            <li><a href="#">163</a></li>
                        </ul>

                        <ul class="product-colors">
                            <h3>available Colors</h3>
                            <li><a class="color1" href="#"><span> </span></a></li>
                            <li><a class="color2" href="#"><span> </span></a></li>
                            <li><a class="color3" href="#"><span> </span></a></li>
                            <li><a class="color4" href="#"><span> </span></a></li>
                            <li><a class="color5" href="#"><span> </span></a></li>
                            <li><a class="color6" href="#"><span> </span></a></li>
                            <div class="clear"> </div>
                        </ul>
                        <div class="btn_form">
                            <form>
                                <input type="submit" value="buy now" title="">
                            </form>
                        </div>
                        <ul class="add-to-links">
                            <!-- <li><img src="images/wish.png" alt=""><a href="#">Add to wishlist</a></li> -->
                        </ul>
                        <!--
                        <div class="social_buttons">
                            <h4>95 Items</h4>
                            <button type="button" class="btn1 btn1-default1 btn1-twitter" onclick="">
                                <i class="icon-twitter"></i> Tweet
                            </button>
                            <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
                                <i class="icon-facebook"></i> Share
                            </button>
                            <button type="button" class="btn1 btn1-default1 btn1-google" onclick="">
                                <i class="icon-google"></i> Google+
                            </button>
                            <button type="button" class="btn1 btn1-default1 btn1-pinterest" onclick="">
                                <i class="icon-pinterest"></i> Pinterest
                            </button>
                        </div>
                        -->
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="col-md-3">
                    <div class="box-info-product">
                        <p class="price2">R$:<?php echo $produtos->precoVenda;?></p>
                        <ul class="prosuct-qty">
                            <span>Quantidade:</span>
                            <select>
                                <?php for ($i = 1; $i <= 10; $i++){
                                    echo "<option value='$i'>$i</option>";
                                }?>
                            </select>
                        </ul>
                        <button type="submit" name="Submit" class="exclusive">
                            <span>Solicitar</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="desc">
                <h4>Description</h4>
                <p><?php echo $produtos->descricao;?></p>
            </div>
            <h4 class="m_11">Produtos Relacionados</h4>
            <div class="row">

                <?php
                foreach ($produtosCategoria as $categoria) { ?>
                    <div class="col-md-3 product1">
                        <a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $categoria->idProdutos;?>"><img src="<?php echo $categoria->url;?>" style="max-width: 100%" class="img-responsive" alt="" /></a>
                        <div class="shop_desc"><a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $categoria->idProdutos;?>">
                            </a><h3><a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $categoria->idProdutos;?>"></a><a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $categoria->idProdutos;?>"><?php echo $categoria->nome;?></a></h3>
                            <p>Lorem ipsum consectetuer adipiscing </p>
                            <!-- <span class="reducedfrom">$66.00</span> -->
                            <span class="actual">R$:<?php echo $categoria->precoVenda;?></span><br>
                            <ul class="buttons">
                                <!-- <li class="cart"><a href="#">Add To Cart</a></li> -->
                                <li class="shop_btn"><a href="<?php echo base_url('index.php/shop/produtosSingle\/') . $categoria->idProdutos;?>">Saiba Mais</a></li>
                                <div class="clear"> </div>
                            </ul>
                        </div>
                    </div>

                    <?php
                }
                ?>



            </div>
        </div>
    </div>
</div>
