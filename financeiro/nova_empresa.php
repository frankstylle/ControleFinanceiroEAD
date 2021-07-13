<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/EmpresaDAO.php';

$objDAO = new EmpresaDAO();

if (isset($_POST['btnGravar'])) {

    $nomeEmpresa = $_POST['nomeEmpresa'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $ret = $objDAO->CadastrarEmpresa($nomeEmpresa, $telefone, $endereco);
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
                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá cadastrar todas suas empresas. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_empresa.php" method="post">
                    <div class="form-group" id="divNomeEmpresa">
                        <label>Nome da empresa*</label>
                        <input class="form-control" placeholder="Digite o nome da empresa. Exemplo: Conta de luz" name="nomeEmpresa" id="nomeEmpresa" maxlength="50" />
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Digite o telefone da empresa." name="telefone" maxlength="11" />
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da empresa." name="endereco" maxlength="100" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarEmpresa()">Gravar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>