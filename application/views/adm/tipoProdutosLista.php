<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="<?= base_url(); ?>" class="logo"><b>COMIDABARATA<span>.com</span></b></a>
        <!--logo end-->

        <div class="btn-group pull-right top-menu" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="" href="<?= base_url(); ?>user">Perfil</a></li>
                    <li><a class="" href="<?= base_url(); ?>">Sair</a></li>
                </ul>
            </div>
        </div>

    </header>

    <!--header end-->
    <section id="main-content">
        <section class="wrapper">

            <!--           Menu Superior                 -->

            <div>
                <ul class="nav nav-pills nav-justified" style="background-color: white">
                    <li role="presentation" class="active"><a href="<?= base_url(); ?>produto/tipoProdutoLista?situacao">Lista</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>produto/tipoProdutoAdd?situacao">Adicionar</a></li>
                    <li role="presentation"><a></a></li>
                </ul>

                <form method="post" action="<?= base_url('produto/tipoProdutoPesquisa') ?>"
                      enctype="multipart/form-data" style="margin-top: 20px;">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" id="tipo_produto_nome" name="tipo_produto_nome" 
                                   class="form-control" placeholder="Pesquisar tipo de produto..." >
                        </div>
                    </div>
                    <div class="col-md-3" align="right">
                        <button type="submit" class="btn btn-primary btn-lg">Pesquisar</button>
                    </div>    
                </form>
            </div>



            <div class="row">
                <div class="col-sm-12" style="">

                    <!--main content start-->
                    <section class="wrapper">
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="content-panel">
                                    <h4><i class="fa fa-angle-right"></i> Tipos de Produtos</h4>
                                    <section id="unseen">
                                        <table class="table table-responsive">                    
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nome</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                                <!-- Busca todos os dados que tem no banco atravez da controler -->
                                                <?php foreach ($tipo_produto as $tipo) { ?>
                                                    <tr>
                                                        <td><p class="col-md-2" style="margin-top: 10px;"> <?= $tipo->tipo_produto_id; ?> </p></td>
                                                        <td><p class="col-md-8" style="margin-top: 10px;"> <?= $tipo->tipo_produto_nome; ?> </p></td>
                                                        <td><p class="col-md-2"><a href="<?= base_url('produto/formUpdate/' . $tipo->tipo_produto_id) ?>" class="btn btn-lg btn-primary btn-group ">Detalhes</a></p></td> 
                                                    </tr>    
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </section>
                                </div><!-- /content-panel -->
                            </div><!-- /col-lg-4 -->			
                        </div><!-- /row -->
                    </section><!-- /MAIN CONTENT -->


                    <!--footer start-->
                    <footer class="site-footer">
                        <div class="text-center">
                            2017 - COMIDABARATA.com - Todos Direitos Reservados
                            <a href="<?= base_url(); ?>" class="go-top">
                                <i class="fa fa-angle-up"></i>
                            </a>
                        </div>
                    </footer>
                    <!--footer end-->

                </div><!-- /col-lg-3 -->
            </div><! --/row -->
        </section>
    </section>


</section>