<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/ContaDAO.php';
$objDAO = new ContaDAO();

if (isset($_POST['btnGravar'])) {

    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $numero = $_POST['numero'];
    $saldo = $_POST['saldo'];

    $ret = $objDAO->CadastrarConta($banco, $agencia, $numero, $saldo);
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
                        <?php include_once '_msg.php'; ?>
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas suas contas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_conta.php" method="post">
                    <div class="form-group" id="divBanco">
                        <label>Nome do Banco*</label>
                        <input class="form-control" placeholder="Digite o nome do banco..." name="banco" id="banco" maxlength="20" />
                    </div>
                    <div class="form-group" id="divAgencia">
                        <label>Agência*</label>
                        <input class="form-control" placeholder="Digite a agência..." name="agencia" id="agencia" maxlength="8" />
                    </div>
                    <div class="form-group" id="divNumero">
                        <label>Número da conta*</label>
                        <input class="form-control" placeholder="Digite o número da conta..." name="numero" id="numero" maxlength="12" />
                    </div>
                    <div class="form-group" id="divSaldo">
                        <label>Saldo*</label>
                        <input class="form-control"  type="number" step="0.01" min="0.01" placeholder="Digite o saldo da conta..." name="saldo" id="saldo" maxlength="10" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarConta()">Gravar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>