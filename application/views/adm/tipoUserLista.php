<section id="container" >
    <!--header end-->
    <section id="main-content">
        <section class="wrapper">

            <!--           Menu Superior                 -->

            <div>
                <ul class="nav nav-pills nav-justified" style="background-color: white">
                    <li role="presentation" class="active"><a href="<?= base_url(); ?>user/tipoUserLista">Lista</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>user/tipoUserAdd">Adicionar</a></li>
                    <li role="presentation"><a></a></li>
                </ul>


            </div>

            <div class="row">
                <div class="col-lg-8 main-chart col-lg-offset-2">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Pesquisa</div>
                        <div class="panel-body">
                            <form method="post" action="<?= base_url('user/tipoUserPesquisa') ?>"
                                  enctype="multipart/form-data" style="margin-top: 20px;">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text" id="user_tipo_nome" name="user_tipo_nome" 
                                               class="form-control" placeholder="Pesquisar tipo de usuário..." >
                                    </div>
                                </div>
                                <div class="col-md-3" align="right">
                                    <button type="submit" class="btn btn-primary btn-lg">Pesquisar</button>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-8 col-lg-offset-2" >

                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><h3>Tipos Usuários</h3></div>
                        <div class="panel-body">

                        </div>

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
                                <?php foreach ($user_tipo as $user_tipo) { ?>
                                    <tr>
                                        <td><p class="col-md-2" style="margin-top: 10px;"> <?= $user_tipo->user_tipo_id; ?> </p></td>
                                        <td><p class="col-md-8" style="margin-top: 10px;"> <?= $user_tipo->user_tipo_nome; ?> </p></td>
                                        <td><p class="col-md-2"><a href="<?= base_url('user/tipoUserUpdate/' . $user_tipo->user_tipo_id) ?>" class="btn btn-lg btn-primary btn-group ">Detalhes</a></p></td> 
                                    </tr>    
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>

</section>