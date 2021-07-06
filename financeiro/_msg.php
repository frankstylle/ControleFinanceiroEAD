<?php

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    if ($ret == 0) {
        echo '<div class="alert alert-warning">
                Preencher o(s) campo(s) obrigatório(s)
              </div>';
    } else if ($ret == 1) {
        echo '<div class="alert alert-success">
                Ação realizada com sucesso
              </div>';
    } else if ($ret == 2) {
        echo '<div class="alert alert-success">
                Registro alterado com sucesso!
              </div>';
    } else if ($ret == -1) {
        echo '<div class="alert alert-danger">
                Ocorreu um erro na operação. Tente mais tarde!
              </div>';
    } else if ($ret == -2) {
        echo '<div class="alert alert-danger">
                A senha deverá conter no mínimo 6 caracteres
              </div>';
    } else if ($ret == -3) {
        echo '<div class="alert alert-danger">
                A Senha e o Repetir Senha não conferem
              </div>';
    } else if ($ret == -4) {
        echo '<div class="alert alert-danger">
                O registro não poderá ser excluido, pois está em uso!
              </div>';
    } else if ($ret == 5) {
        echo '<div class="alert alert-danger">
                O registro foi Excluido com sucesso!
              </div>';
    } else if ($ret == 5) {
        echo '<div class="alert alert-danger">
                O registro foi Excluido com sucesso!
              </div>';
    } else if ($ret == -5) {
        echo '<div class="alert alert-danger">
                E-mail já cadastrado. Coloque um outro e-mail!
              </div>';
    } else if ($ret == -6) {
        echo '<div class="alert alert-danger">
                Usuário não encontrado!
              </div>';
    }
}
