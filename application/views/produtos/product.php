<section id="container" >
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
                <div class="col-lg-11 main-chart">
                    <form method="post" action="<?= base_url('produto/comprar') ?>"
                          enctype="multipart/form-data">

                        <input type="hidden" id="produto_id" name="produto_id" value="<?= $produto[0]->produto_id ?>">

                        <h1><?= $produto[0]->produto_nome ?></h1>
                        <br>

                        <div class="col-sm-12">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-3">
                                <img src="<?= base_url(); ?>images/<?= $produto[0]->produto_foto; ?>" class="img-thumbnail" width="300px" height="300px" >
                            </div>

                            <!--Preço-->

                            <div class="col-sm-8">
                                <div class="col-sm-1">
                                    <h5> Preço</h5>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="col-sm-8">
                                    <h2 style="color: red"> R$ <?= $produto[0]->produto_preco_novo ?> </h2>
                                </div>
                            </div>

                            <!--Quantidade-->

                            <div class="col-sm-8">
                                <div class="col-sm-1">
                                    <h5> Quant</h5>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <input type="text" id="transacao_produto_estoque" name="transacao_produto_estoque" 
                                               class="form-control" size="15">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <label for="regiao_id"> Frete </label>

                                <select class="form-control" id="regiao_id" name="regiao_id" >
                                    <?php foreach ($regiao as $tp) { ?>  
                                        <option value="<?= $tp->regiao_id; ?>">  <?= $tp->regiao_nome; ?>  - <?= $tp->regiao_preco; ?>  </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-sm-3" style="margin-top: 20px">
                                <div class="col-sm-1" align="right">
                                    <button type="submit" class="btn btn-md btn-success">Comprar</button>
                                </div>   
                            </div>

                        </div>
                    </form>
                </div>
        </section>
    </section>
</section>