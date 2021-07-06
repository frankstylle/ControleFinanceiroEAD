<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/ContaDAO.php';

$objDAO = new ContaDAO();

$contas = $objDAO->ConsultarConta();


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <!-- /. NAV TOP  -->

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2>Consultar Conta</h2>
                        <h5>Consulte todas suas contas aqui. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Contas cadastradas. Caso deseja alterar, clique no botão
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Banco</th>
                                        <th>Agência</th>
                                        <th>Número da conta</th>
                                        <th>Saldo</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contas as $conta) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $conta['banco_conta'] ?></td>
                                            <td><?= $conta['agencia_conta'] ?></td>
                                            <td><?= $conta['numero_conta'] ?></td>
                                            <td><?= $conta['saldo_conta'] ?></td>
                                            <td>
                                                <a href="alterar_conta.php?cod=<?= $conta['id_conta'] ?>" class="btn btn-warning btn-sm">Alterar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>