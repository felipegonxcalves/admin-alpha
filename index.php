<?php
    require_once __DIR__ . '/validate-login.php';
    validateAuth();
    require __DIR__ . '/header_template.php';
    require __DIR__ . '/menu.php';
    require_once __DIR__ . '/functions.php';



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
                                    <form id="form" action="service_interviewee.php" method="post">
                                        <input type="hidden" name="type_operation" id="type_operation" value="insert">
                                        <input type="hidden" name="ideentrevistado" id="ideentrevistado">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Nome Completo</label>
                                            <input type="text" name="pnomentrevistado" id="pnomentrevistado" placeholder="Informe o nome do cliente" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">C.P.F.</label>
                                            <input type="text" id="pnrocpf" name="pnrocpf" placeholder="CPF" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" id="btn-submit-form" class="btn btn-primary btn-sm">
                                                Salvar
                                            </button>
                                            <button type="reset" class="btn btn-warning btn-sm">
                                                Limpar
                                            </button>
                                            <button type="reset" onclick="deleteInterviewee()" class="btn btn-danger btn-sm">
                                                Excluir
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
                                            <?php foreach ($getAllInterviewee() as $user): ?>
                                                <tr>
                                                    <td><?php echo $user['nomentrevistado']; ?></td>
                                                    <td><?php echo $user['nrocpf']; ?></td>
                                                    <td><?php echo $user['stsativo']; ?></td>
                                                    <td><button class="btn btn-success btn-edit-interviewee" onclick="editInterviewee(this)" data-id="<?php echo $user["ideentrevistado"]; ?>" data-nomentrevistado="<?php echo $user["nomentrevistado"]; ?>" data-nrocpf="<?php echo $user["nrocpf"]; ?>">Editar</button></td>
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
    function editInterviewee(element){
        document.getElementById('pnomentrevistado').value = element.dataset.nomentrevistado;
        document.getElementById('pnrocpf').value = element.dataset.nrocpf;
        document.getElementById('ideentrevistado').value = element.dataset.ideentrevistado;
        document.getElementById('type_operation').value = "update";
        document.getElementById('pnomentrevistado').focus();
    }
    
    function deleteInterviewee() {
        document.getElementById('type_operation').value = "delete";
        if (document.getElementById('pnrocpf').value != ""){
            document.getElementById('btn-submit-form').click();
        }
    }
</script>

</body>

</html>
<!-- end document-->
