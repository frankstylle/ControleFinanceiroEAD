<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/ContaDAO.php';
$objDAO = new ContaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $id = $_GET['cod'];
    $conta = $objDAO->DetalharConta($id);

    if (count($conta) == 0) {
        header('location: consultar_conta.php');
        exit;
    }
} else if (isset($_POST['btnSalvar'])) {
    $id = $_POST['cod'];
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $num = $_POST['num'];
    $saldo = $_POST['saldo'];

    $ret = $objDAO->AlterarConta($id, $banco, $agencia, $num, $saldo);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnExcluir'])) {
    $id = $_POST['cod'];
    $ret = $objDAO->ExcluirConta($id);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_conta.php');
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
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar ou excluir suas contas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="alterar_conta.php" method="post">
                    <div class="form-group" id="divBanco">
                        <input type="hidden" name="cod" value="<?= $conta[0]['id_conta'] ?>">
                        <label>Nome do Banco*</label>
                        <input class="form-control" name="banco" placeholder="Digite o nome do banco..." id="banco" value="<?= $conta[0]['banco_conta'] ?>" maxlength="20" />
                    </div>
                    <div class="form-group" id="divAgencia">
                        <label>Agência*</label>
                        <input class="form-control" name="agencia" placeholder="Digite a agência..." id="agencia" value="<?= $conta[0]['agencia_conta'] ?>" maxlength="8" />
                    </div>
                    <div class="form-group" id="divNumero">
                        <label>Número da conta*</label>
                        <input class="form-control" name="num" placeholder="Digite o número da conta..." id="numero" value="<?= $conta[0]['numero_conta'] ?>" maxlength="12" />
                    </div>
                    <div class="form-group" id="divSaldo">
                        <label>Saldo*</label>
                        <input class="form-control" type="number" step="0.01" min="0.01" name="saldo" placeholder="Digite o saldo da conta..." id="saldo" value="<?= $conta[0]['saldo_conta'] ?>" maxlength="10" />
                    </div>
                    <button type="submit" name="btnSalvar" class="btn btn-success" onclick="return ValidarConta()">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" >Excluir</button>

                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel"><b>Confirmação de exclusão</b></h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a conta: <span style="color: red"><u><b><?= $conta[0]['banco_conta'] ?> / <?= $conta[0]['agencia_conta'] ?> - <?= $conta[0]['numero_conta'] ?> ?</u></b></span>
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