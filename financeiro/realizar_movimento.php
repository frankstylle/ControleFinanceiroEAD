<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/EmpresaDAO.php';
require_once '../DAO/ContaDAO.php';

$objDAO = new MovimentoDAO();

// criar os objeto para receber dados do BD
$cat = new CategoriaDAO();
$emp = new EmpresaDAO();
$con = new ContaDAO();

//Chamar os método para pesquisar no BD e puxar os dados
$categorias = $cat->ConsultarCategoria();
$empresas = $emp->ConsultarEmpresa();
$contas = $con->ConsultarConta();

//Ação de clique no botão de Finalizar
if (isset($_POST['btnGravar'])) {
    //Pegar os dados do usuario
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];
    $empresa = $_POST['empresa'];
    $conta = $_POST['conta'];
    $obs = $_POST['obs'];

    //mandar os dados para o método
    $ret = $objDAO->RealizarMovimento($tipo, $data, $valor, $categoria, $empresa, $conta, $obs);
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
                        <h2>Realizar Movimento</h2>
                        <h5>Aqui você poderá realizar seus movimento de entrada ou saída. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="realizar_movimento.php" method="post">
                    <div class="col-md-6">
                        <div class="form-group" id="divTipo">
                            <label>Tipo do movimento*</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="form-group" id="divData">
                            <label>Data*</label>
                            <input type="date" class="form-control" placeholder="Coloque a data do movimento" name="data" id="data" />
                        </div>
                        <div class="form-group" id="divValor">
                            <label>Valor*</label>
                            <input type="number" step="0.01" min="0.01" class="form-control" placeholder="Digite o valor do movimento" name="valor" id="valor" maxlength="10" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" id="divCategoria">
                            <label>Categoria*</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                <?php foreach ($categorias as $item) { ?>
                                    <option value="<?= $item['id_categoria'] ?>"><?= $item['nome_categoria'] ?></option>

                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group" id="divEmpresa">
                            <label>Empresa*</label>
                            <select class="form-control" name="empresa" id="empresa">
                                <option value="">Selecione</option>
                                <?php foreach ($empresas as $item) { ?>
                                    <option value="<?= $item['id_empresa'] ?>"><?= $item['nome_empresa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" id="divConta">
                            <label>Conta*</label>
                            <select class="form-control" name="conta" id="conta">
                                <option value="">Selecione</option>
                                <?php foreach ($contas as $item) { ?>
                                    <option value="<?= $item['id_conta'] ?>"><?= $item['banco_conta'] . ' - Ag. ' . $item['agencia_conta'] . '  - Núm. conta: ' . $item['numero_conta'] . ' - Saldo: R$ ' . $item['saldo_conta'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação(opcional)</label>
                            <textarea class="form-control" rows="3" name="obs" maxlength="100"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="btnGravar" onclick=" return ValidarMovimento()">Finalizar lançamento</button>
                    </div>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>