<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/EmpresaDAO.php';

$objDAO = new EmpresaDAO();

$dados = $objDAO->ConsultarEmpresa();

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
                        <?php include_once '_msg.php'; ?>
                        <h2>Consultar Empresa</h2>
                        <h5>Consulte todas suas empresas aqui. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Empresas cadastradas. Caso deseja alterar, clique no botão
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nome da empresa</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dados as $value) { ?>
                                        <tr class="odd gradeX">
                                            <td><?= $value['nome_empresa'] ?></td>
                                            <td><?= $value['telefone_empresa'] ?></td>
                                            <td><?= $value['endereco_empresa'] ?></td>
                                            <td>
                                                <a href="alterar_empresa.php?id=<?= $value['id_empresa'] ?>" class="btn btn-warning btn-sm">Alterar</a>
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