<?php
require_once __DIR__ . '/validate-login.php';
validateAuth();
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
                                <small>Cadastro de Usuário</small>
                            </div>
                            <div class="card-body card-block">
                                <form id="form" action="service_user.php" method="post">
                                    <input type="hidden" name="type_operation" id="type_operation" value="insert">
                                    <input type="hidden" name="pideusuario" id="pideusuario">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Login</label>
                                        <input type="text" name="pdeslogin" id="pdeslogin" placeholder="Login" class="form-control" required="required" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="vat" class=" form-control-label">Senha</label>
                                        <input type="password" id="pdessenha" name="pdessenha" placeholder="Senha" class="form-control" required="required" autocomplete="off">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="btn-submit-form" class="btn btn-primary btn-sm">
                                            Salvar
                                        </button>
                                        <button type="reset" onclick="clearInputs()" class="btn btn-warning btn-sm">
                                            Limpar
                                        </button>
                                        <button type="reset" onclick="InabiliteUser()" class="btn btn-danger btn-sm">
                                            Inabilitar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <small>Clientes Cadastrados</small>
                            </div>
                            <div class="card-body card-block">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Login</th>
                                        <th>Situação</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($getAllUsers() as $user): ?>
                                        <tr>
                                            <td><?php echo $user['deslogin']; ?></td>
                                            <td><?php echo $user['stsativo']; ?></td>
                                            <td><button class="btn btn-success btn-edit-user" onclick="editUser(this)" data-id="<?php echo $user["ideusuario"]; ?>" data-login="<?php echo $user["deslogin"]; ?>" data-senha="<?php echo $user["dessenha"]; ?>">Editar</button></td>
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




<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>

<script>
    function editUser(element){
        document.getElementById('pdeslogin').value = element.dataset.login;
        document.getElementById('pdessenha').value = element.dataset.senha;
        document.getElementById('pideusuario').value = element.dataset.id;
        // document.getElementById('type_operation').value = "update";
        document.getElementById('pdeslogin').focus();
    }

    function InabiliteUser() {
        document.getElementById('type_operation').value = "inabilit";
        let ideusuario = document.getElementById('pideusuario').value
        document.getElementById('btn-submit-form').click();
    }

    function clearInputs() {
        document.getElementById('pdeslogin').value = "";
        document.getElementById('pdessenha').value = "";
    }
</script>

</body>

</html>
<!-- end document-->
