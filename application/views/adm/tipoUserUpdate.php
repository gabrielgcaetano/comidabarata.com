<section id="container" >
    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <!--           Menu Superior                 -->
            <div>
                <ul class="nav nav-pills nav-justified" style="background-color: white">
                    <li role="presentation" class="active"><a href="<?= base_url(); ?>user/tipoUserLista">Lista</a></li>
                    <li role="presentation"><a></a></li>
                    <li role="presentation"><a></a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-lg-6 main-chart col-lg-offset-3">

                    <form method="post" action="<?= base_url('user/tipoUserUpdateSalvar') ?>"
                          enctype="multipart/form-data">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> Atualizando Tipo de Usuário </h3>
                            </div>
                            <div class="panel-body">
                                <input type="hidden" id="user_tipo_id" name="user_tipo_id" value="<?= $user_tipo[0]->user_tipo_id ?>">

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="user_tipo_nome"> Nome </label>
                                        <input type="text" id="user_tipo_nome" name="user_tipo_nome" 
                                               class="form-control" value="<?= $user_tipo[0]->user_tipo_nome ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="user_tipo_status"> Status Tipo User </label>
                                    <select class="form-control" id="user_tipo_status" name="user_tipo_status" >
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="panel-footer">                       
                                <button type="submit" class="btn btn-lg btn-info col-lg-offset-10">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
</section>