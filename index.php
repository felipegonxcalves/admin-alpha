<?php
    require __DIR__ . '/header_template.php';
    require __DIR__ . '/menu.php';
    require __DIR__ . '/functions.php';
?>


    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">

                        <div class="header-button">

                            <div class="account-wrap">
                                <div class="content">
                                    Área Administrativa - Tempo decorrido da sessão: 00:00:00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <small>Cadastro de Cliente</small>
                                </div>
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Nome Completo</label>
                                        <input type="text" id="company" placeholder="Informe o nome do cliente" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">C.P.F.</label>
                                        <input type="text" id="vat" placeholder="CPF" class="form-control">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Salvar
                                        </button>
                                        <button type="reset" class="btn btn-warning btn-sm">
                                            Limpar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <small>Cadastro de Cliente</small>
                                </div>
                                <div class="card-body card-block">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Situação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($getAllUsers() as $user): ?>
                                                <tr>
                                                    <td><?php echo $user['nomentrevistado']; ?></td>
                                                    <td><?php echo $user['nrocpf']; ?></td>
                                                    <td><?php echo $user['stsativo']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

</div>

<?php
    require __DIR__ . '/js_includes.php';
?>



</body>

</html>
<!-- end document-->
