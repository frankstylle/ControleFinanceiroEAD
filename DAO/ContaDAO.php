<?php
require_once '../DAO/Conexao.php';
require_once '../DAO/UtilDAO.php';

class ContaDAO extends Conexao
{

    public function CadastrarConta($banco, $agencia, $num, $saldo)
    {

        if (trim($banco) == '' || trim($agencia) == '' || trim($num) == '' || trim($saldo) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();

        $comando_sql = 'INSERT INTO tb_conta (banco_conta,
                                              agencia_conta,
                                              numero_conta,
                                              saldo_conta,
                                              id_usuario)
                             VALUES (?, ?, ?, ?, ?)';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $num);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, UtilDAO::UsuarioLogado());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function ConsultarConta()
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'SELECT id_conta,
                               banco_conta,
                               agencia_conta,
                               numero_conta,
                               saldo_conta
                          FROM tb_conta
                         WHERE id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharConta($id)
    {
        if(trim($id == '')){
            return 0;
        }
        
        $conexao = parent::retornarConexao();
        $comando_sql = 'SELECT id_conta,
                               banco_conta,
                               agencia_conta,
                               numero_conta,
                               saldo_conta
                          FROM tb_conta
                         WHERE id_conta = ?
                           AND id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlterarConta($id, $banco, $agencia, $num, $saldo)
    {
        if (trim($id) == '' || trim($banco) == '' || trim($agencia) == '' || trim($num) == '' || trim($saldo) == '') {
            return 0;
        }
        $conexao = parent::retornarConexao();

        $comando_sql = 'UPDATE tb_conta SET banco_conta = ?,
                                            agencia_conta = ?,
                                            numero_conta = ?,
                                            saldo_conta = ?
                                      WHERE id_conta = ?
                                        AND id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $banco);
        $sql->bindValue(2, $agencia);
        $sql->bindValue(3, $num);
        $sql->bindValue(4, $saldo);
        $sql->bindValue(5, $id);
        $sql->bindValue(6, UtilDAO::UsuarioLogado());

        try {
            $sql->execute();
            return 2;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirConta($id)
    {
        if(trim($id) == ''){
            return 0;
        }

        $conexao = parent::retornarConexao();
        $comando_sql = 'DELETE FROM tb_conta
                              WHERE id_conta = ?
                                AND id_usuario = ?';
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1, $id);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        try{
            $sql->execute();
            return 5;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            return -4;
        }
    }
}
