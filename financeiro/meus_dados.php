<?php
require_once '../DAO/UtilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/UsuarioDAO.php';

$objDAO = new UsuarioDAO();

$dados = $objDAO->CarregarMeusDados();

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $objDAO = new UsuarioDAO();

    $ret = $objDAO->GravarMeusDados($nome, $email);
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
        <!-- /. NAV TOP  -->

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2>Meus Dados</h2>
                        <h5>Nesta página, você poderá alterar seus dados. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="meus_dados.php" method="post">
                    <div class="form-group" id="divNome">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite seu nome..." name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" maxlength="50"  />
                    </div>
                    <div class="form-group" id="divEmail">
                        <label>E-mail</label>
                        <input class="form-control" placeholder="Digite seu e-mail..." name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>" maxlength="50"  />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarMeusDados()">Gravar</button>
                </form>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

</body>

</html>