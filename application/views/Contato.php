<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="map">
<!--                        <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=AIzaSyArgAqACzcHYfcrQFZZqjIY3G0uS3G3SnI"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px"></a></small> -->

                    </div>
                </div>
                <div class="col-md-5">
                    <p class="m_8">

                    </p>
                    <div class="address">
                        <p>Av: Lobo Junior, 1835</p>
                        <p>CEP: 21020-123 / Penha Circular.</p>
                        <p>Funcionamos das 07:30Hs ás 17:30.</p>
                        <p>Telefone: +55 (21)2260-6708 / (21) 2280-7998 </p>
                        <p>Whatssap: (21) 99929-0392</p>
                        <p>Email: <span>contato@serralherialobojunior.com.br</span></p>
                        <p>Nos siga: <span>Facebook</span>, <span>Twitter</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 contact">
                    <form method="post" action="<?php base_url();?>contato/EnviarEmail">
                        <div class="to">
                            <input type="text" name="nome" class="text" value="Nome" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nome';}">
                            <input type="text" name="email" class="text" value="E-mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail';}">
                            <input type="text" name="assunto" class="text" value="Assunto" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Assunto';}">
                        </div>
                        <div class="text">
                            <textarea name="mensagem" value="Mensagem:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mensagem';}">Message:</textarea>
                            <div class="form-submit">
                                <input name="submit" type="submit" id="submit" value="Enviar"><br>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>