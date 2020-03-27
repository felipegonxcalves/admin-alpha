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
<!--                <div class="row">-->
<!--                    <div class="col-lg-12">-->
<!--                        <div class="card">-->
<!--                            <div class="card-header" id="teste-teste">-->
<!--                                <small>Cadastro de Usuário</small>-->
<!--                            </div>-->
<!--                            <div class="card-body card-block">-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <div class="card">
                                    <div class="card-header">
                                        <small>Gráfico de Perfil Comportamental</small>
                                    </div>
                                    <canvas id="grafico02"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <div class="card">
                                    <div class="card-header">
                                        <small>Gráfico de Dominância Cerebral</small>
                                    </div>
                                    <canvas id="grafico01"></canvas>
                                </div>
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
                                            <td><button class="btn btn-success btn-edit-interviewee" onclick="exibirGraficos(this)" data-id="<?php echo $user["ideentrevistado"]; ?>" data-nomentrevistado="<?php echo $user["nomentrevistado"]; ?>" data-nrocpf="<?php echo $user["nrocpf"]; ?>">Exibir</button></td>
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



    function exibirGraficos(element) {
        let pideentrevistado = element.dataset.id;

        const requestGrafico = $.ajax({
            method:'POST',
            url:'graficos.php',
            data: {pideentrevistado: pideentrevistado, tipoGrafico: "01"},
            dataType:'json'
        });

        requestGrafico.done(function(response){
            if (response.status){
                console.log(response);
                let grafico01 = document.getElementById('grafico01');
                var myChart = new Chart(grafico01, {
                    type: 'radar',
                    data: {
                        labels: [response.grafico1[0].desdominancia, response.grafico1[1].desdominancia, response.grafico1[2].desdominancia, response.grafico1[3].desdominancia],
                        datasets: [{
                            label: 'Dominância Cerebral',
                            data: [response.grafico1[0].valpeso, response.grafico1[1].valpeso, response.grafico1[2].valpeso, response.grafico1[3].valpeso],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                let grafico02 = document.getElementById('grafico02');
                var myChart02 = new Chart(grafico02, {
                    type: 'radar',
                    data: {
                        labels: [response.grafico2[0].desdominancia, response.grafico2[1].desdominancia, response.grafico2[2].desdominancia, response.grafico2[3].desdominancia],
                        datasets: [{
                            label: 'Perfil comportamental',
                            data: [response.grafico2[0].valpeso, response.grafico2[1].valpeso, response.grafico2[2].valpeso, response.grafico2[3].valpeso],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });

                window.scrollTo(0, 0);
            }
        });


    }

</script>

</body>

</html>
<!-- end document-->
