<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO//EmpresaDAO.php';

$objDAO = new EmpresaDAO();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idEmpresa = $_GET['id'];
    $empresas = $objDAO->DetalharEmpresa($idEmpresa);

    if (count($empresas) == 0) {
        header('location: consultar_empresa.php');
        exit;
    }
} else if (isset($_POST['btnSalvar'])) {
    $idEmpresa = $_POST['cod'];
    $nome = $_POST['nomeEmpresa'];
    $tel = $_POST['tel'];
    $endereco = $_POST['endereco'];

    $ret = $objDAO->AlterarEmpresa($idEmpresa, $nome, $tel, $endereco);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnExcluir'])) {
    $idEmpresa = $_POST['cod'];
    $ret = $objDAO->ExcluirEmpresa($idEmpresa);

    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_empresa.php');
    exit;
}

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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá alterar ou excluir suas empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_empresa.php" method="post">
                    <div class="form-group" id="divNomeEmpresa">
                        <input type="hidden" name="cod" value="<?= $empresas[0]['id_empresa'] ?>">
                        <label>Nome da empresa*</label>
                        <input class="form-control" placeholder="Digite o nome da empresa. Exemplo: Conta de luz" id="nomeEmpresa" name="nomeEmpresa" value="<?= $empresas[0]['nome_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Digite o telefone da empresa." name="tel" value="<?= ($empresas[0]['telefone_empresa']) ?>" />
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da empresa." name="endereco" value="<?= $empresas[0]['endereco_empresa'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-success" onclick="ValidarEmpresa()" name="btnSalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>


                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>Confirmação de exclusão</b></h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a empresa: <span style="color: red"><u><b><?= $empresas[0]['nome_empresa'] ?> </u></b></span>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="btnExcluir" class="btn btn-primary">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>