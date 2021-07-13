<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/CategoriaDAO.php';

$objDAO = new CategoriaDAO();

if (isset($_POST['btnGravar'])) {
    $nomeCategoria = $_POST['nomeCategoria'];

    $ret = $objDAO->CadastrarCategoria($nomeCategoria);
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
                        <h2>Nova Categoria</h2>
                        <h5>Aqui você poderá cadastrar todas suas categorias. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="nova_categoria.php" method="post">
                    <div class="form-group" id="divCategoria">
                        <label>Nome da categoria</label>
                        <input class="form-control" placeholder="Digite o nome da categoria. Exemplo: alimentação" name="nomeCategoria" id="categoria" maxlength="35" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarCategoria()">Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</body>

</html>