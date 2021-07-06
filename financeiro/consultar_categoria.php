<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/CategoriaDAO.php';

$objDAO = new CategoriaDAO();

$categorias = $objDAO->ConsultarCategoria();
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
                        <h2>Consultar Categoria</h2>
                        <h5>Consulte todas suas categorias aqui. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />

                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categorias cadastradas. Caso deseja alterar, clique no botão
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nome da categoria</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($categorias as $value){ ?>
                                    <tr class="odd gradeX">
                                        <td><?= $value['nome_categoria'] ?></td>
                                        <td>
                                            <a href="alterar_categoria.php?cod=<?= $value['id_categoria'] ?>" class="btn btn-warning btn-sm">Alterar</a>
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